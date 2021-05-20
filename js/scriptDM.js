
let lastIdDM = 0 // id du dernier message affiché

// On attend le chargement du document

window.onload = () => {

	let texte = document.querySelector("#messageDM")
	texte.addEventListener("keyup", verifEntreeDM)

	let valid = document.querySelector("#posterDM")
	valid.addEventListener("click", ajoutDMs)

    setInterval(chargeDMs, 1000)


}


function chargeDMs(){
    // On instancie XMLHttpRequest
    let xmlhttpdm = new XMLHttpRequest()


    let idDestinataire = document.querySelector('#idDestinataire').value
    let mon_id = document.querySelector('#idutilisateur').value
    //console.log(idcommunaute)

    // donnees = {}
	// donnees["idcommunaute"] = idcommunaute
	// on convertit les données en JSON
	// let donneesJson = JSON.stringify(donnees)


    // On gère la réponse
    xmlhttpdm.onreadystatechange = function(){
        if (this.readyState == 4){
            if(this.status == 200){
                // On a une réponse
                // On convertit la réponse en objet JS
                let messages = JSON.parse(this.response)

                // On retourne l'objet
                //messages.reverse()

                // On récupère la div #discussion
                let discussion = document.querySelector("#discussionDM")

                for(let message of messages){
                    // On transforme la date du message en JS
                    let dateMessage = new Date(message.datemessage)

                    if (mon_id == message.utilisateur){
                    // On ajoute le contenu avant le contenu actuel de discussion
                    // discussion.innerHTML = discussion.innerHTML + `<p>${message.pseudo} a écrit le ${dateMessage.toLocaleString()} : ${message.message}</p>` 
                    discussion.innerHTML = discussion.innerHTML + `
					<li class="out">
        					<div class="chat-img">
        						<img alt="Avtar" src="DATA/profil_pp/${message.image}">
        					</div>
					<div class="chat-body">
        						<div class="chat-message">
        							<h5> ${message.pseudo} </h5>
        							<p>${message.message}</p>
        						</div>
        					</div>
        			</li>`

                 	}
                 	else {

					discussion.innerHTML = discussion.innerHTML + `
					<li class="in">
        					<div class="chat-img">
        						<img alt="Avtar" src="DATA/profil_pp/${message.image}">
        					</div>
					<div class="chat-body">
        						<div class="chat-message">
        							<h5> ${message.pseudo} </h5>
        							<p>${message.message}</p>
        						</div>
        					</div>
        			</li>`
                 	}
// <p class='barre'>${message.pseudo} : ${dateMessage.toLocaleString()} : ${message.message}</p>

                    // On met à jour le lastId
                    lastIdDM = message.idmessage
                }
            }else{
                // On gère les erreurs
                let erreur = JSON.parse(this.response)
                alert(erreur.message)
            }
        }
    }

    // On ouvre la requête
    xmlhttpdm.open("GET", "functions/chargeDM.php?lastIdDM="+lastIdDM + "&destinataire="+idDestinataire + "&utilisateur="+mon_id)
    // On envoie
    xmlhttpdm.send()
}


function verifEntreeDM(e){

	if (e.key == "Enter"){
		ajoutDMs();
	}

}

function ajoutDMs(){

	// On récupère le message
	console.log('ok')
	let message = document.querySelector('#messageDM').value
	let idDestinataire = document.querySelector('#idDestinataire').value
	//console.log(idcommunaute)
	console.log(message)
	console.log(idDestinataire)
	// on vérifie si le message n'est pas vide

	if (message != ""){
		// On crée un objet JS
		let donneesDM = {}
		donneesDM["messageDM"] = message
		donneesDM["iddesti"] = idDestinataire
		// on convertit les données en JSON
		let donneesJsonDM = JSON.stringify(donneesDM)
		console.log(donneesJsonDM)
		// pour envoyer direct les infos en ajax

		// on envoie les données en POST en Ajax
		// On instancie XMLHttpRequest
		let xmlhttpdm = new XMLHttpRequest()

		// On gère la réponse
		xmlhttpdm.onreadystatechange = function() {
			// on vérifie si la requête est terminée
			if (this.readyState == 4){
				// c bon j'ai crée le message : il renvoie un statut
				// on vérifie qu'on reçoit un code 201 ? 200 ?
				console.log(this.status)
				if (this.status==201 || this.status==200){
					// l'enregistrement a fonctionné
					// on efface le champ texte
					document.querySelector('#messageDM').value = ""
				}
				else {
					// l'enregistrement a échoué
					let reponse = JSON.parse(this.response)
					alert(reponse.message)

				}
			}
		}

		// on ouvre la requête 
		xmlhttpdm.open("POST", "functions/ajoutDM.php")

		// on envoie la requête en incluant les données
		xmlhttpdm.send(donneesJsonDM)

		}
}