class timer{
    now
    duration;

    hours;
    minutes;
    seconds;

    domID;
    element;
    constructor(duration, domID){
        this.now = new Date().getTime() / 1000;
        this.duration = duration + this.now;
        this.domID = domID;

        this.hours = Math.floor(duration/(60*60));
        this.minutes = Math.floor(duration/(60));
        this.seconds = Math.floor(duration);

        this.element = document.getElementById(domID);
        this.element.innerText = this.hours +':' + this.minutes + ':' + this.seconds;
    }

    startTimer(){
        const intv = setInterval(() => {

            const remainder = this.duration - this.now;

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