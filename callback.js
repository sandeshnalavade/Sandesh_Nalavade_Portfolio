function fetchData(callback){
    setTimeout(()=>{
        console.log('It is practice');
        callback();

    }, 2000);
}

function processData(){
    console.log('Yes Practice...');
}

console.log('Start');
fetchData(processData);
console.log('End')