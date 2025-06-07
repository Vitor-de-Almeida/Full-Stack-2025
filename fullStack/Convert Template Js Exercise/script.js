//obtendo o valor digitado pelo usuário

const inputButton = window.document.getElementById('amount')

const form = window.document.getElementsByTagName('form')[0]

const footer = window.document.getElementsByTagName('footer')[0]

const moeda = window.document.getElementById('description')

const resultado = window.document.getElementById('result')

form.addEventListener('submit', (e) => {
    e.preventDefault()
    const inputValue = inputButton.value
    const regex = /\d+/g
    if (regex.test(inputValue)) {
        const selectedCurrency = window.document.getElementById('currency').value
        console.log(inputValue)
        if (selectedCurrency === "USD") {
            moeda.innerText = 'US$ 1 = R$ 4,86'
            resultado.innerText = (4.86 * inputValue).toFixed(2) + ' Reais'
            footer.style.display = 'block'
            }
        else if (selectedCurrency === "EUR") {
            moeda.innerText = 'EUR 1 = R$ 5,49'
            resultado.innerText = (5.49 * inputValue).toFixed(2) + ' Reais'
            footer.style.display = 'block'
        } else {
            moeda.innerText = 'GBP 1 = R$ 6,81'
            resultado.innerText = (6.81 * inputValue).toFixed(2) + ' Reais'
            footer.style.display = 'block'
        }
    } else {
        alert("Valor inválido")
    }
})



