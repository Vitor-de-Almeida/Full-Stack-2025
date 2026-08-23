import { openingHours } from '../../utils/opening-hours.js';
import dayjs from 'dayjs';
import { hoursClick } from './hoursClick.js';

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

        if (hour === "09:00") {
            hourHeaderAdd("Manhã");
        } else if (hour === "13:00") {
            hourHeaderAdd("Tarde");
        } else if (hour === "19:00") {
            hourHeaderAdd("Noite");
        }
        hoursList.append(hourItem);
    })
    //Adiciona o evento de clique nos horários disponíveis
    hoursClick();
}

function hourHeaderAdd(title) {
    const header = document.createElement('li');
    header.classList.add('hour-period');
    header.textContent = title;
    hoursList.append(header);
}