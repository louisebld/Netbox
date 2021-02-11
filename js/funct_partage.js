
function copierLien() {
  var textCopier = document.querySelector("#lien");

  textCopier.select(); //Selection du texte
  textCopier.setSelectionRange(0, 99999); // Pour le téléphone 

  document.execCommand("copy"); //Copie du texte dans le presse papier

  alert("Copied the text: " + copyText.value);
}