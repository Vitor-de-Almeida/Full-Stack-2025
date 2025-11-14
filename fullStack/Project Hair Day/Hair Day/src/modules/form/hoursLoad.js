import { openingHours } from '../../utils/opening-hours.js';
import dayjs from 'dayjs';

const hoursList = document.getElementById('hours');

export function hoursLoad ({date}) {
    const openingAllHours = openingHours.map((hour) => {
        //Recupera somente a hora
        const [onlyHour] = hour.split(':');
        //Adiciona a hora na date e verificar se está no passado.
        const isHourInPast = dayjs(date).add(Number(onlyHour), 'hour').isAfter(dayjs());
        //Define se o horário está disponível
        return {
            hour,
            available: isHourInPast,
         
        };
    });

    //Renderiza os horários disponíveis
    openingAllHours.forEach(({hour, available}) => {
        const hourItem = document.createElement('li')   ;
        hourItem.classList.add("hour");
        hourItem.classList.add(available ? "hour-available" : "hour-unavailable");
        hourItem.textContent = hour;
        hoursList.append(hourItem);
    })
}