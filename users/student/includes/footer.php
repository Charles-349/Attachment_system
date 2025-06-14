<script>
    const menuIcon = document.querySelector(".menu-icon");
    const sidebar = document.querySelector(".sidebar");

    menuIcon.addEventListener('click', () => {
        console.log(sidebar);
        sidebar.classList.toggle("open");
    })
</script>

</body>

</html>