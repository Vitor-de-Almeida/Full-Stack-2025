import {createElement} from 'react';
import {createRoot} from 'react-dom/client';

const root = document.getElementById("root")

const elementH1 = createElement("h1", null, "Hello World")

root.render(elementH1)

console.log(elementH1)