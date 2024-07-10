window.onload = function () {
    var app = new App();
    window.app = app;

    const buttons = document.querySelectorAll("button[id^='btn-carrito']");
    const vaciarButton = document.querySelector("#btn-vaciar-carrito");
    const vaciarForm = document.querySelector("#form-vaciar-carrito");

    buttons.forEach((btn, index) => {
        
        btn.addEventListener("click", function(e) {
            Swal.fire({
                position: "top-center",
                icon: "success",
                title: "Se añadio al carrito correctamente",
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                document.getElementById('purchaseForm').submit();
            });
            e.preventDefault();
            fetch(btn.form.action, {
                method: btn.form.method,
                body: new FormData(btn.form)
            })
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.querySelector('.number');
                if (cartCountElement) {
                    cartCountElement.textContent = `(${data.cartCount})`;
                }
            })
            .catch(error => {
                console.error('Error al enviar datos:', error);
            });
        });
    });
    if (vaciarButton) {
        vaciarButton.addEventListener("click", function(e) {
            e.preventDefault();
            fetch(vaciarForm.action, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                const cartCountElement = document.querySelector('.number');
                if (cartCountElement) {
                    cartCountElement.textContent = `(${data.cartCount})`;
                }

                
                const tableBody = document.querySelector('table tbody');
                if (tableBody) {
                    location.reload();
                }
            })
            .catch(error => {
                console.error('Error al vaciar el carrito:', error);
            });
        });
    }
};


function App() {}

App.prototype.processingButton = function(event) {
    const btn = event.currentTarget;
    const slickList = event.currentTarget.parentNode;
    const track = event.currentTarget.parentNode.querySelector('#track');
    const slick = track.querySelectorAll('.categoria');

    const slickWidth = slick[0].offsetWidth;

    const trackWidth = track.offsetWidth;
    const listWidth = slickList.offsetWidth;

    track.style.left == "" ? leftPosition = track.style.left = 0 : leftPosition = parseFloat(track.style.left.slice(0, -2) * -1);

    btn.dataset.button == "button-prev" ? prevAction(leftPosition, slickWidth, track) : nextAction(leftPosition, trackWidth, listWidth, slickWidth, track);
}

let prevAction = (leftPosition, slickWidth, track) => {
    if (leftPosition > 0) {
        track.style.left = `${-1 * (leftPosition - slickWidth)}px`;
    }
}

let nextAction = (leftPosition, trackWidth, listWidth, slickWidth, track) => {
    if (leftPosition < (trackWidth - listWidth)) {
        track.style.left = `${-1 * (leftPosition + slickWidth)}px`;
    }
}
