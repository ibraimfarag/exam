<!--/* --------------------------------- jquery --------------------------------- */-->

<script src="{{ asset('assets/frontend/js/jquery.slim.js') }}"></script>


<!--/* -------------------------------- Bootstrap ------------------------------- */-->


<script src="{{ asset('assets/frontend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navItems = document.querySelectorAll(".navbar-nav .nav-item");

        navItems.forEach((item, index) => {
            const animationDelay = (index + 1) * 0.2; // Adjust delay as needed
            item.style.animation = `staggeredDropIn 0.5s ease-out ${animationDelay}s forwards`;
        });
    });
</script>
