// let lastIdDM = 0 // id du dernier message affiché

// On attend le chargement du document

function start(id){

	var form = document.querySelector("#dmprofil" + id)

	let texte = form.querySelector("#messageDM")
	texte.addEventListener("keyup",  function () {
		verifEntreeDM(id)
	})

	let valid = form.querySelector("#posterDM")
	valid.addEventListener("click", function () {
		ajoutDMs(id)
	})

	let fermer = form.querySelector("#close")
	fermer.addEventListener("click", function () {
		clearInterval(loop)
	})

	let fermer2 = form.querySelector("#close2")
	fermer2.addEventListener("click", function () {
		clearInterval(loop)
	})

	var loop = setInterval(function () {
		chargeDMs(id)
	}, 1000)

	// setTimeout(function () {document.addEventListener("click", function () {
	// 	clearInterval(loop)
	// })},50)




}


function chargeDMs(id){

	

    // On instancie XMLHttpRequest
    let xmlhttpdm = new XMLHttpRequest()

	var form = document.querySelector("#dmprofil" + id)

    let idDestinataire = form.querySelector('#idDestinataire').value
    let mon_id = form.querySelector('#idutilisateur').value
    let lastIdDM = form.querySelector('#lastIdDM' + id).value // on récupère l'id du dernier message affiché
    let ModiflastIdDM = form.querySelector('#ModiflastIdDM' + id) // on récupère la div où on stock l'id du dernier message affiché
    //console.log(idcommunaute)
    console.log('Je charge !')
    

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
                let discussion = form.querySelector("#discussionDM" + id)

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
                    ModiflastIdDM.innerHTML = `<input type="hidden" id="lastIdDM${idDestinataire}" name="lastIdDM${idDestinataire}" value="${message.idmessage}" />`
                }
            }else{
                // On gère les erreurs
                let erreur = JSON.parse(this.response)
                alert(erreur.message)
            }
        }
    }

    // On ouvre la requête
    xmlhttpdm.open("GET", "functions/chargeDM.php?lastIdDM="+ lastIdDM + "&destinataire="+ idDestinataire + "&utilisateur="+ mon_id)
    // On envoie
    xmlhttpdm.send()
}


function verifEntreeDM(id){

	if (event.key == "Enter"){
		ajoutDMs(id);
	}

}

function ajoutDMs(id){

	var form = document.querySelector("#dmprofil" + id)

	// On récupère le message
	console.log('ok')
	let message = form.querySelector('#messageDM').value
	let idDestinataire = form.querySelector('#idDestinataire').value
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
					form.querySelector('#messageDM').value = ""
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