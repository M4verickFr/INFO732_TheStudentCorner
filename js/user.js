document.addEventListener("DOMContentLoaded", function() {
    if (window.location.search.substr(1).endsWith("profil")) {
        let inputs = document.querySelectorAll('.btn-remove')
        console.log(inputs)

        inputs.forEach(input=>input.addEventListener("click", function() {
            // delete parent
            this.parentNode.parentNode.removeChild(this.parentNode);
        }));
     };
});

