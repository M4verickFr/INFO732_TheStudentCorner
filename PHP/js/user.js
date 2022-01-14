document.addEventListener("DOMContentLoaded", function() {
    if (window.location.search.substr(1).endsWith("profil")) {
        let inputs = document.querySelectorAll('.btn-remove')

        inputs.forEach(input=>input.addEventListener("click", function() {
            // delete parent
            this.parentNode.parentNode.removeChild(this.parentNode);

            // send informations to server
            axios.post('?r=user/delete', `idproduit=${this.dataset.id}`);
        }));
     };
});

