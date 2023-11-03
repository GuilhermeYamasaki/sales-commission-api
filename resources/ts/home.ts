import axios from 'axios'
import Swal from 'sweetalert2';

const logout = document.querySelector('.logout') as HTMLButtonElement;

logout.addEventListener('click', async () => {
    Swal.fire({
        title: 'Deslogando...',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    await axios.delete(logout.id);
    location.href = '/login';
});
