function deleteItemUtil(pid) {
    document.fdelete.deleteItem.value = pid;
    respuesta = confirm("¿Está seguro de borrar el registro?");
    if (respuesta)
    {
        document.fdelete.submit();
    }
}