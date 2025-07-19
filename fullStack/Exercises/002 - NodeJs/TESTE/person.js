export {Person}

class Person {
    constructor(name, age) {
        this.name = name;
        this.age = age
    }

    sayMyData () {
        return `My name is ${this.name} and my age is ${this.age}`
    }
}