// ===== GESTION DU FORMULAIRE DE CONTACT =====
class ContactForm {
    constructor() {
        this.form = document.getElementById('contact-form');
        this.submitBtn = this.form?.querySelector('button[type="submit"]');
        this.originalBtnText = this.submitBtn?.textContent;
        
        this.init();
    }
    
    init() {
        if (!this.form) return;
        
        // Écouter la soumission du formulaire
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        
        // Validation en temps réel
        this.setupRealTimeValidation();
        
        // Auto-resize du textarea
        this.setupTextareaResize();
    }
    
    async handleSubmit(e) {
        e.preventDefault();
        
        // Désactiver le bouton et changer le texte
        this.setLoadingState(true);
        
        // Récupérer les données du formulaire
        const formData = new FormData(this.form);
        
        try {
            const response = await fetch('./contact_handler.php', {
                method: 'POST',
                body: formData
            });
            
            const result = await response.json();
            
            if (result.success) {
                this.showSuccessMessage(result.message);
                this.form.reset();
                this.clearValidationErrors();
            } else {
                this.showErrorMessage(result.message, result.errors);
            }
            
        } catch (error) {
            console.error('Erreur:', error);
            this.showErrorMessage('Une erreur réseau est survenue. Veuillez réessayer.');
        } finally {
            this.setLoadingState(false);
        }
    }
    
    setLoadingState(loading) {
        if (!this.submitBtn) return;
        
        this.submitBtn.disabled = loading;
        this.submitBtn.innerHTML = loading ? 
            '<span class="loading-spinner"></span>Envoi en cours...' : 
            this.originalBtnText;
    }
    
    showSuccessMessage(message) {
        // Supprimer les anciens messages
        this.clearMessages();
        
        const successDiv = document.createElement('div');
        successDiv.className = 'form-message success-message';
        successDiv.innerHTML = `
            <div class="message-icon">✅</div>
            <div class="message-content">
                <strong>Message envoyé !</strong>
                <p>${message}</p>
            </div>
        `;
        
        this.form.insertBefore(successDiv, this.form.firstChild);
        
        // Animation d'apparition
        setTimeout(() => successDiv.classList.add('show'), 100);
        
        // Auto-suppression après 8 secondes
        setTimeout(() => {
            successDiv.classList.add('fade-out');
            setTimeout(() => successDiv.remove(), 500);
        }, 8000);
    }
    
    showErrorMessage(message, errors = []) {
        // Supprimer les anciens messages
        this.clearMessages();
        
        const errorDiv = document.createElement('div');
        errorDiv.className = 'form-message error-message';
        
        let errorsList = '';
        if (errors && errors.length > 0) {
            errorsList = '<ul>' + errors.map(error => `<li>${error}</li>`).join('') + '</ul>';
        }
        
        errorDiv.innerHTML = `
            <div class="message-icon">❌</div>
            <div class="message-content">
                <strong>Erreur</strong>
                <p>${message}</p>
                ${errorsList}
            </div>
        `;
        
        this.form.insertBefore(errorDiv, this.form.firstChild);
        
        // Animation d'apparition
        setTimeout(() => errorDiv.classList.add('show'), 100);
    }
    
    clearMessages() {
        const messages = this.form.querySelectorAll('.form-message');
        messages.forEach(msg => msg.remove());
    }
    
    clearValidationErrors() {
        const inputs = this.form.querySelectorAll('.form-group input, .form-group textarea');
        inputs.forEach(input => {
            input.classList.remove('error');
            const errorMsg = input.parentNode.querySelector('.field-error');
            if (errorMsg) errorMsg.remove();
        });
    }
    
    setupRealTimeValidation() {
        const inputs = this.form.querySelectorAll('input, textarea');
        
        inputs.forEach(input => {
            input.addEventListener('blur', () => this.validateField(input));
            input.addEventListener('input', () => {
                // Supprimer l'erreur quand l'utilisateur tape
                if (input.classList.contains('error')) {
                    input.classList.remove('error');
                    const errorMsg = input.parentNode.querySelector('.field-error');
                    if (errorMsg) errorMsg.remove();
                }
            });
        });
    }
    
    validateField(field) {
        const value = field.value.trim();
        const fieldName = field.getAttribute('name');
        let isValid = true;
        let errorMessage = '';
        
        // Supprimer l'ancien message d'erreur
        const oldError = field.parentNode.querySelector('.field-error');
        if (oldError) oldError.remove();
        
        // Validation selon le type de champ
        switch (fieldName) {
            case 'name':
                if (!value) {
                    errorMessage = 'Le nom est obligatoire';
                    isValid = false;
                } else if (value.length < 2) {
                    errorMessage = 'Le nom doit contenir au moins 2 caractères';
                    isValid = false;
                }
                break;
                
            case 'email':
                if (!value) {
                    errorMessage = 'L\'email est obligatoire';
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
                    errorMessage = 'Format d\'email invalide';
                    isValid = false;
                }
                break;
                
            case 'message':
                if (!value) {
                    errorMessage = 'Le message est obligatoire';
                    isValid = false;
                } else if (value.length < 10) {
                    errorMessage = 'Le message doit contenir au moins 10 caractères';
                    isValid = false;
                }
                break;
        }
        
        // Afficher l'erreur si nécessaire
        if (!isValid) {
            field.classList.add('error');
            const errorDiv = document.createElement('div');
            errorDiv.className = 'field-error';
            errorDiv.textContent = errorMessage;
            field.parentNode.appendChild(errorDiv);
        } else {
            field.classList.remove('error');
        }
        
        return isValid;
    }
    
    setupTextareaResize() {
        const textarea = this.form.querySelector('textarea');
        if (!textarea) return;
        
        const autoResize = () => {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        };
        
        textarea.addEventListener('input', autoResize);
        
        // Initialiser la taille
        setTimeout(autoResize, 100);
    }
}

// Initialiser le formulaire de contact quand la page est chargée
document.addEventListener('DOMContentLoaded', () => {
    new ContactForm();
});

// Ajouter les styles pour les messages et animations
const contactStyles = `
    /* Messages de formulaire */
    .form-message {
        display: flex;
        align-items: flex-start;
        padding: 16px;
        margin-bottom: 20px;
        border-radius: 8px;
        transform: translateY(-10px);
        opacity: 0;
        transition: all 0.3s ease;
    }
    
    .form-message.show {
        transform: translateY(0);
        opacity: 1;
    }
    
    .form-message.fade-out {
        opacity: 0;
        transform: translateY(-10px);
    }
    
    .success-message {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
    }
    
    .error-message {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }
    
    .message-icon {
        font-size: 24px;
        margin-right: 12px;
        flex-shrink: 0;
    }
    
    .message-content {
        flex: 1;
    }
    
    .message-content strong {
        display: block;
        font-size: 16px;
        margin-bottom: 4px;
    }
    
    .message-content p {
        margin: 0;
        opacity: 0.9;
    }
    
    .message-content ul {
        margin: 8px 0 0 0;
        padding-left: 20px;
    }
    
    .message-content li {
        margin: 4px 0;
        opacity: 0.9;
    }
    
    /* Validation des champs */
    .form-group input.error,
    .form-group textarea.error {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        animation: shake 0.3s ease-in-out;
    }
    
    .field-error {
        color: #ef4444;
        font-size: 14px;
        margin-top: 6px;
        display: flex;
        align-items: center;
        animation: slideDown 0.3s ease;
    }
    
    .field-error:before {
        content: "⚠️";
        margin-right: 6px;
        font-size: 12px;
    }
    
    /* Animation de validation */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-4px); }
        75% { transform: translateX(4px); }
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Spinner de chargement */
    .loading-spinner {
        display: inline-block;
        width: 16px;
        height: 16px;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: white;
        animation: spin 0.8s ease-in-out infinite;
        margin-right: 8px;
    }
    
    @keyframes spin {
        to { transform: rotate(360deg); }
    }
    
    /* Bouton désactivé */
    button:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none !important;
    }
    
    /* Auto-resize textarea */
    textarea {
        resize: vertical;
        min-height: 120px;
        transition: height 0.2s ease;
    }
`;

// Injecter les styles dans la page
if (!document.querySelector('#contact-form-styles')) {
    const styleSheet = document.createElement('style');
    styleSheet.id = 'contact-form-styles';
    styleSheet.textContent = contactStyles;
    document.head.appendChild(styleSheet);
}