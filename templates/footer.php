<footer class="py-5 bg-dark" style="background-image: url('assets/img/fondo_home_page.jpg'); background-size: cover; background-position: center;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
        <br><br>
        <!-- Google Maps Integration -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7542.024859922501!2d-98.1486749!3d19.0631911!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc1c9a30530ab%3A0xefd33e2f1a6ca5a2!2sUniversidad%20Tecnol%C3%B3gica%20de%20Puebla!5e0!3m2!1ses!2smx!4v1723504293891!5m2!1ses!2smx" 
                width="100%" 
                height="300" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS -->
<script src="js/scripts.js"></script>
<script src="js/script.js"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
</script>
