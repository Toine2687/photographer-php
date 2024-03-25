// ------- envoi d'images multiples dans la galerie --------
const gal_pictures = document.getElementById('gal_pictures')
const uploadBtn = document.getElementById('uploadBtn')
const form = document.querySelector('form')


// formulaire FormData
const fData = new FormData()
// Ajout de l'id de la galerie
fData.set('galleries_id', gal_pictures.dataset.galleries_id)
// Ectoueur et action
uploadBtn.addEventListener('click', () => {
    const spinner = document.createElement('p')
    spinner.innerHTML = '<i class="fa-solid fa-spinner"></i>'
    form.appendChild(spinner)
    // Tant qu'il y a des fichiers à uploader
    let count = 0
    for (let i = 0; i < gal_pictures.files.length; i++) {

        // Ajout de chaque fichier au form
        fData.set('gal_pictures', gal_pictures.files[i])
        // Initialisation du form
        const myInit = { method: 'POST', body: fData }
        console.log(gal_pictures.files[i].name);
        // Soumission au controleur
        fetch('/controllers/dash/galleries/pic-AjaxCtrl.php', myInit)
            // ensuite => on envoie la réponse du back ss forme de json
            .then((response) => response.json())
            // ensuite => upload des images
            .then((data) => {
                console.log(data);
            })
        count++
        spinner.style.transform = 'rotate(360deg)'
        if (count == gal_pictures.files.length) {
            form.removeChild(spinner)
            const okMsg = document.createElement('p')
            okMsg.innerHTML = '<p class="text-success fs-3 text-center mt-3"><i class="fa-solid fa-check"></i> Fichiers uploadés avec succès ! </p>'
            form.appendChild(okMsg)
        }
    }
})