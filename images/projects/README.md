# Guide d'ajout d'images de projets

## Structure des dossiers

Placez vos captures d'écran de projets dans ce dossier `images/projects/`.

## Convention de nommage

Pour que les images s'affichent correctement dans les modals de projets, suivez cette convention :

### Projet CINEMAP
- `cinemap-1.jpg` - Page d'accueil avec carte
- `cinemap-2.jpg` - Filtres et recherche
- `cinemap-3.jpg` - Détails d'un cinéma
- `cinemap-4.jpg` - Statistiques

### Projet Formulaire de Contact
- `contact-1.jpg` - Interface du formulaire
- `contact-2.jpg` - Validation des champs
- `contact-3.jpg` - Message de confirmation

### Projet Site Web avec BDD
- `website-1.jpg` - Page d'accueil
- `website-2.jpg` - Interface d'administration
- `website-3.jpg` - Gestion des données
- `website-4.jpg` - Vue responsive

## Recommandations

- **Format** : JPG ou PNG
- **Dimensions** : Minimum 800x500px (ratio 16:10 recommandé)
- **Poids** : Maximum 500KB par image (optimisez vos images)
- **Qualité** : Assurez-vous que les captures sont nettes et représentatives

## Personnalisation

Pour ajouter plus d'images ou modifier les projets, éditez le fichier :
`Script/project-modal.js`

Dans la section `projectsData`, modifiez le tableau `images` :

```javascript
images: [
  'images/projects/votre-image-1.jpg',
  'images/projects/votre-image-2.jpg',
  // Ajoutez autant d'images que nécessaire
]
```

## Placeholder

Si vous n'avez pas encore d'images, des placeholders seront affichés automatiquement avec l'icône "image".
