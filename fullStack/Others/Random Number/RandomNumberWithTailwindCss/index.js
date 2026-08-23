const buttonSort = document.getElementById('button-sort');

buttonSort.addEventListener('click', () => {
    const numbersAmount = Number(document.getElementById('numbers-amount').value);
    const numbersFrom = Number(document.getElementById('numbers-from').value);
    const numbersTo = Number(document.getElementById('numbers-to').value);
    
    if (numbersAmount >= numbersTo - numbersFrom + 1) {
        alert('The quantity of numbers is greater than the number range');
        return;
    } else if (numbersAmount <= 0) {
        alert('The selected quantity of numbers is less than 0. Please select a greater quantity.');
        return;
    } else if (numbersFrom <= 0) {
        alert('The selected starting number is less than 0. Please select a greater number.');
        return;
    } else if (numbersTo <= 0) {
        alert('The selected ending number is less than 0. Please select a greater number.');
        return;
    } else if (numbersFrom >= numbersTo) {
        alert('The selected starting number is greater than the ending number. Please select a smaller number.');
        return;
    }  else {
        console.log(numbersAmount, numbersFrom, numbersTo);
    }

    const numbers = [];
    while (numbers.length < numbersAmount) {
        const min = numbersFrom;
        const max = numbersTo;
        const randomNumber = Math.floor(Math.random() * (max - min + 1)) + min;

        const toggleNoRepeat = document.getElementById('toggle-no-repeat');
            
        if (toggleNoRepeat.checked) {
            if (!numbers.includes(randomNumber)) {
                numbers.push(randomNumber);
            }
        } else {
            numbers.push(randomNumber);
        }
    }
    numbers.sort((a, b) => a - b);
    console.log(numbers);

    const resultContent = document.getElementById('result-content');
    const sortContent = document.getElementById('sort-content');
    sortContent.classList.add('hidden');
    resultContent.classList.remove('hidden');
    const resultNumbers = document.getElementById('result-numbers');
    resultNumbers.innerText = numbers.join('  ');
});


const buttonSortAgain = document.getElementById('button-sort-again');
buttonSortAgain.addEventListener('click', () => {
    const resultContent = document.getElementById('result-content');
    const sortContent = document.getElementById('sort-content');
    resultContent.classList.add('hidden');
    sortContent.classList.remove('hidden');
});

