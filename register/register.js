
function validate_form ( )
{
    valid = true;

    if (document.registration.passwd.value.length < 4)
    {
        alert("Пароль слишком короткий")
        return false
    }
    if (document.registration.passwd.value !== document.registration.passwd2.value)
    {
        alert("Пароли не совпадают")
        return false
    }
    return valid;
}
