class timer {
    constructor(duration, domID) {
        let arr = duration.split(":");
        this.duration = parseInt(arr[2]) + (60 * (parseInt(arr[1]) + 60 * parseInt(arr[0])));
        this.domID = domID;

        this.hours = Math.floor(this.duration / 60 / 60) + "";
        this.minutes = Math.floor(this.duration / 60 % 60) + "";
        this.seconds = Math.floor(this.duration % 60) + "";

        this.duration += new Date().getTime() / 1000;

        this.element = document.getElementById(domID);
        this.element.innerText = this.hours.padStart(2, '0') + ":" + this.minutes.padStart(2, '0') + ":" + this.seconds.padStart(2, '0');
        this.startTimer();
    }

    startTimer() {
        const intv = setInterval(() => {
            this.now = new Date().getTime() / 1000;
            const remainder = this.duration - this.now;
            this.hours = Math.floor(remainder / (60 * 60)) + "";
            this.minutes = Math.floor(remainder / (60) % 60) + "";
            this.seconds = Math.floor(remainder % 60) + "";

            this.element.innerText = this.hours.padStart(2, '0') + ":" + this.minutes.padStart(2, '0') + ":" + this.seconds.padStart(2, '0');
        }, 1000);
    }

    getRemaindingTime() {
        return [this.hours, this.minutes, this.seconds];
    }
}