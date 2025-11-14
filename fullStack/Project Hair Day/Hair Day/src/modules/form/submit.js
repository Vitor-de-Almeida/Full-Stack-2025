import dayjs from "dayjs"

const form = document.querySelector('form');
const clientName = document.getElementById("client")
const selectedDate = document.getElementById('date');

// Date atual para o input de data
const inputToday = dayjs(new Date()).format('YYYY-MM-DD');

// Define a data atual como valor padrão do campo de data
selectedDate.value = inputToday

// Define a data mínima como a data atual
selectedDate.min = inputToday

form.onsubmit = (event) => {
    event.preventDefault();
    alert('Formulário enviado!');

    try {
        //Recuperando o nome do cliente
        const name = clientName.value.trim();
        if (!name) {
            return alert("Por favor, insira seu nome")
        }
        const hourSelected = document.querySelector('.hour-selected');
        console.log(hourSelected)
        
        if (!hourSelected) {
            return alert("Por favor, selecione um horário")
        }
        const [hourNow] = hourSelected.innerText.split(";");

        const when = dayjs(selectedDate.value).add(Number(hourNow), 'hour');
        console.log(when)
    } catch(error) {
        alert("Não foi possível realizar o agendamento")
        console.log(error)
    }
};