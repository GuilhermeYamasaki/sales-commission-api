const form = document.querySelector('form') as HTMLFormElement;
import axios from 'axios'
import Swal from 'sweetalert2'

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const { value: email } = document.querySelector('#email') as HTMLInputElement
    const { value: password } = document.querySelector('#password') as HTMLInputElement

    try {
        const { data } = await axios.post(form.action, {
            email,
            password
        })

        localStorage.setItem('token', data.token)
        location.href = '/'
    }
    catch (error) {
        Swal.fire({
            title: 'E-mail ou senha incorretos!',
            icon: 'error',
            toast: true,
            timer: 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            position: 'top-end'
        })
    }
});
