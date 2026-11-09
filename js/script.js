window.onload = function ()
{
    const check = document.getElementById("destacado");
    const beca = document.getElementById("divBeca");

    function mostrarBeca()
    {
        if (check.checked)
        {
            beca.style.display = "block";
        }
        else
        {
            beca.style.display = "none";
        }
    }

    check.addEventListener("change", mostrarBeca);

    mostrarBeca();
}