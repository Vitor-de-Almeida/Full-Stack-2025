export default function PersonalInfo () {
    return (
        <main>
            <div className="name-and-title">
                <h1>Vitor Renan de Almeida</h1>
                <h2>Full Stack Developer</h2>
                <a href="www.youtube.com" target="_blank">vitorrenan.website</a>
            </div>
            <div className="boxes-email-linkedin">
                <div className="email-box">
                    <a href="mailto:vitorrenanalmeida@gmail.com" target="_blank"><img src="../assets/Mail.png" alt="email" />Email</a>
                </div>
                <div className="linkedin-box">
                    <a href="https://www.linkedin.com/in/vitor-renan-de-almeida-b20b41200/" target="_blank"><img src="../assets/Linkedin.png" alt="linkedin" />LinkedIn</a>
                </div>
            </div>
            <div className="info">
                <h1 className="title-about-me">
                    About
                </h1>
                <p className="text-about-me">
                     Balancing law enforcement with a passion for programming and gaming, your life blends discipline with digital creation. Anchored by your family, you spend your time building PCs and exploring technology.
                </p>
            </div>
            <div className="info">
                <h1 className="title-interests">
                    Interests
                </h1>
                <p className="text-interests">
                    Building PCs, exploring technology, programming, gaming, and spending time with family.
                </p>
            </div>
        </main>
    )
}