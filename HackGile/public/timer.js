class timer{
    duration;

    hours;
    minutes;
    seconds;

    domID;
    element;
    constructor(duration, domID){
        this.duration = duration;
        this.domID = domID;

        this.hours = Math.floor(duration/(60*60));
        this.minutes = Math.floor(duration/(60));
        this.seconds = Math.floor(duration);

        this.element = document.getElementById(domID);
        this.element.innerText = this.hours +':' + this.minutes + ':' + this.seconds;
    }

    startTimer(){
        const intv = setInterval(() => {
            const now = new Date().getTime() / 1000;
            const remainder = this.duration - now;

            this.hours = Math.floor(remainder/(60*60));
            this.minutes = Math.floor(remainder/(60));
            this.seconds = Math.floor(remainder);

            this.element.innerText = this.hours +':' + this.minutes + ':' + this.seconds;
        }, 1000);
    }

    getRemaindingTime(){
        return [this.hours, this.minutes, this.seconds];
    }
}