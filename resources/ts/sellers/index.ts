import api from '../helpers/api'
import Swal from 'sweetalert2'

const routeToGetSellers = document.querySelector('#route') as HTMLInputElement

const loadingList = async () => {
    const listElement = document.querySelector('#sellers-list') as HTMLBodyElement

    const { data: sellers } = await api.get(routeToGetSellers.value)

    const trsTemplate = sellers.data.map((seller: Seller) => {
        return `
        <tr class="bg-gray-100">
            <td class="border px-4 py-2">${seller.id}</td>
            <td class="border px-4 py-2">${seller.name}</td>
            <td class="border px-4 py-2">${seller.email}</td>
            <td class="border px-4 py-2">
                <button class="comission bg-green-500 text-white px-4 py-2 rounded-full hover:bg-green-600 ml-2" id="${seller.actions?.comission}">Reenviar Relatório</button>
                <button class="delete bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 ml-2" id="${seller.actions?.delete}">Excluir</button>
            </td>
        </tr>
    `
    })

    listElement.innerHTML = trsTemplate.join('')
    insertDeleteEvent()
    insertComissionEvent()
}

const insertDeleteEvent = () => {
    document.querySelectorAll('.delete')
        .forEach(button => {
            button.addEventListener('click', async (e) => {
                const result = await Swal.fire({
                    title: 'Você tem certeza que deseja excluir este vendedor?',
                    text: "Você não poderá reverter esta ação!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#333',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true
                })

                if (!result.isConfirmed) {
                    return
                }

                const { id: route } = button
                await api.delete(route)
                loadingList()
            })
        })
}

const insertComissionEvent = () => {
    document.querySelectorAll('.comission')
        .forEach(button => {
            button.addEventListener('click', async (e) => {
                const result = await Swal.fire({
                    title: 'Reenviar relatório de comissão ao vendedor?',
                    text: "Escolha uma data para o relatório:",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Sim, enviar!',
                    cancelButtonText: 'Cancelar',
                    reverseButtons: true,
                    input: 'date',
                    inputAttributes: {
                        max: new Date().toISOString().slice(0, 10),
                    },
                    preConfirm: (date) => {
                        const selectedDate = new Date(date);
                        const today = new Date();

                        if (!date || selectedDate > today) {
                            Swal.showValidationMessage('Selecione uma data válida');
                        }

                        return selectedDate;
                    }
                })

                if (!result.isConfirmed) {
                    return
                }

                const { id: route } = button
                await api.patch(route, { day: result.value })
            })
        })
}

loadingList()

