// Your code here
function countArrayPositive(array){
    let count = 0;
    for(let i = 0; i < array.length;i++){
        let num = array[i];
        if(Math.abs(num) === num){
            count += num;
        }
    }
    return count;
}

console.log(countArrayPositive([50,-10,100,0,5,-1,-5,-6]));