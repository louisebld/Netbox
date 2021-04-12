let lastId = 0 // id du dernier message affiché

// On attend le chargement du document

window.onload = () => {

	let texte = document.querySelector("#message")
	texte.addEventListener("keyup", verifEntree)

	let valid = document.querySelector("#postermessagecommu")
	valid.addEventListener("click", ajoutMessage)

    setInterval(chargeMessages, 1000)


}


function chargeMessages(){
    // On instancie XMLHttpRequest
    let xmlhttp = new XMLHttpRequest()


    let idcommunaute = document.querySelector('#iddemacommu').value
    //console.log(idcommunaute)

    // donnees = {}
	// donnees["idcommunaute"] = idcommunaute
	// on convertit les données en JSON
	// let donneesJson = JSON.stringify(donnees)


    // On gère la réponse
    xmlhttp.onreadystatechange = function(){
        if (this.readyState == 4){
            if(this.status == 200){
                // On a une réponse
                // On convertit la réponse en objet JS
                let messages = JSON.parse(this.response)

                // On retourne l'objet
                //messages.reverse()

                // On récupère la div #discussion
                let discussion = document.querySelector("#discussion")

                for(let message of messages){
                    // On transforme la date du message en JS
                    let dateMessage = new Date(message.datemessage)

                    // On ajoute le contenu avant le contenu actuel de discussion
                    // discussion.innerHTML = discussion.innerHTML + `<p>${message.pseudo} a écrit le ${dateMessage.toLocaleString()} : ${message.message}</p>` 
                     discussion.innerHTML = discussion.innerHTML + `<p>${message.pseudo} : ${dateMessage.toLocaleString()} : ${message.message}</p>` 

                    // On met à jour le lastId
                    lastId = message.idmessage
                }
            }else{
                // On gère les erreurs
                let erreur = JSON.parse(this.response)
                alert(erreur.message)
            }
        }
    }

    // On ouvre la requête
    xmlhttp.open("GET", "functions/chargeMessage.php?lastId="+lastId + "&commu="+idcommunaute)
    // On envoie
    xmlhttp.send()
}


function verifEntree(e){

	if (e.key == "Enter"){
		ajoutMessage();
	}

}

function ajoutMessage(){

	// On récupère le message
	console.log('ok')
	let message = document.querySelector('#message').value
	let idcommunaute = document.querySelector('#idcommu').value
	//console.log(idcommunaute)
	console.log(message)
	// on vérifie si le message n'est pas vide

	if (message != ""){
		// On crée un objet JS
		let donnees = {}
		donnees["message"] = message
		donnees["idcommunaute"] = idcommunaute
		// on convertit les données en JSON
		let donneesJson = JSON.stringify(donnees)
		// pour envoyer direct les infos en ajax

		// on envoie les données en POST en Ajax
		// On instancie XMLHttpRequest
		let xmlhttp = new XMLHttpRequest()

		// On gère la réponse
		xmlhttp.onreadystatechange = function() {
			// on vérifie si la requête est terminée
			if (this.readyState == 4){
				// c bon j'ai crée le message : il renvoie un statut
				// on vérifie qu'on reçoit un code 201 ? 200 ?
				console.log(this.status)
				if (this.status==201 || this.status==200){
					// l'enregistrement a fonctionné
					// on efface le champ texte
					document.querySelector('#message').value = ""
				}
				else {
					// l'enregistrement a échoué
					let reponse = JSON.parse(this.response)
					alert(reponse.message)

				}
			}
		}

		// on ouvre la requête 
		xmlhttp.open("POST", "functions/ajoutMessage.php")

		// on envoie la requête en incluant les données
		xmlhttp.send(donneesJson)

		}
}