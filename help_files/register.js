
function validate_form ( )
{
    valid = true;

    if (document.registration.password.value.length < 7)
    {
        alert("Пароль слишком короткий")
        return false
    }
    if (document.registration.password.value !== document.registration.password2.value)
    {
        alert("Пароли не совпадают")
        return false
    }
    return valid;
}
