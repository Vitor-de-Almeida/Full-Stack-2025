import {createRoot} from 'react-dom/client'
import './styles.css'
import Header from './components/header'
import PersonalInfo from './components/personalInfo'

const root = createRoot(document.getElementById('root'));

root.render(
    <>
        <Header /> 
        <PersonalInfo />
    </>
);