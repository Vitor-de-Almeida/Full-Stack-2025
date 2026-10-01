import {createRoot} from 'react-dom/client'
import './styles.css'
import Header from './components/header'
import PersonalInfo from './components/personalInfo'
import Footer from './components/footer'

const root = createRoot(document.getElementById('root'));

root.render(
    <>
        <Header /> 
        <PersonalInfo />
        <Footer />
    </>
);