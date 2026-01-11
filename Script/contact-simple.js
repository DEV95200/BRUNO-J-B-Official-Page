// JavaScript SIMPLE pour le formulaire de contact
console.log('🚀 Contact form script loaded');

document.addEventListener('DOMContentLoaded', () => {
    console.log('🎯 DOM loaded, initializing contact form...');
    const form = document.getElementById('contact-form');
    
    if (!form) {
        console.error('❌ Formulaire non trouvé !');
        return;
    }
    
    console.log('✅ Formulaire trouvé !');
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        console.log('📧 Envoi du formulaire...');
        
        // Récupérer les données
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        
        // Messages d'état
        const showMessage = (message, type) => {
            // Supprimer ancien message
            const oldMessage = document.querySelector('.form-message');
            if (oldMessage) oldMessage.remove();
            
            // Créer nouveau message
            const messageDiv = document.createElement('div');
            messageDiv.className = `form-message ${type}`;
            messageDiv.innerHTML = `
                <span>${type === 'success' ? '✅' : '❌'}</span>
                <span>${message}</span>
            `;
            messageDiv.style.cssText = `
                display: flex; 
                align-items: center; 
                gap: 10px; 
                padding: 15px; 
                margin: 10px 0; 
                border-radius: 8px; 
                background: ${type === 'success' ? '#dcfce7' : '#fee2e2'}; 
                color: ${type === 'success' ? '#166534' : '#991b1b'}; 
                border: 1px solid ${type === 'success' ? '#16a34a' : '#dc2626'};
                font-weight: 500;
            `;
            form.parentNode.insertBefore(messageDiv, form);
        };
        
        // État de chargement
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '⏳ Envoi en cours...';
        
        try {
            console.log('🔄 Envoi vers contact_handler.php...');
            const response = await fetch('./contact_handler.php', {
                method: 'POST',
                body: formData
            });
            
            console.log('📨 Réponse reçue:', response.status);
            const result = await response.json();
            console.log('📋 Données reçues:', result);
            
            if (result.success) {
                showMessage('✅ Message envoyé avec succès ! Je vous répondrai rapidement.', 'success');
                form.reset();
                console.log('🎉 Succès !');
            } else {
                showMessage('❌ Erreur: ' + (result.message || 'Erreur inconnue'), 'error');
                console.log('❌ Erreur:', result);
            }
            
        } catch (error) {
            console.error('🚨 Erreur réseau:', error);
            showMessage('❌ Erreur de connexion. Vérifiez votre connexion internet.', 'error');
        }
        
        // Restaurer le bouton
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    });
    
    console.log('🎯 Event listener ajouté au formulaire');
});