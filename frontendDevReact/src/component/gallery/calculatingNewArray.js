//**********************************************************************
//*  Функуия принимает исходный массив с шириной картинок initialArray,
//*  Размер экрана initialWindowWidth,
//*   И возвращает новый высчитанный массив, с новой шириной картинок.
//**********************************************************************


export default  function calculatingNewArray(initialArray, initialWindowWidth){
  
  // При переборе формируется массив, состоящий из перебираемого ряда.
  let arrayRecordValues = [];
  
  // В этот массив записываем новый массив для высчитанных блоков и его возвращаем.
  let newArrayWidth = [];

  // В переменную сохраняем сумму width блоков в ряду.
  let seveWidthSum = 0;


  function recordValues(meaning){
    
    arrayRecordValues.push(meaning);
  }

  function resetRecord(){
    newCalculatingWidth();
    arrayRecordValues = [];
    seveWidthSum = 0;
    
  }
  function lastRow(){
    arrayRecordValues.map((item) => {
      newArrayWidth.push(item);
    })
    
  }

  function newCalculatingWidth(){
   
    let difference =seveWidthSum-initialWindowWidth;

    //высчитываем излишек 
    let surplus = Math.round((difference) / arrayRecordValues.length);
   
    
    //высчитываем добавочное 
    let additional = (difference-(surplus*arrayRecordValues.length));
  
    for (let vr = 0; vr < arrayRecordValues.length; ++vr) {
       
      if(vr == arrayRecordValues.length-1){

        newArrayWidth.push(arrayRecordValues[vr] - surplus - additional);

      }else{
        newArrayWidth.push(arrayRecordValues[vr]-surplus);
      }
      

    }


  }

 

  for (let vr = 0; vr < initialArray.length; ++vr) {

    seveWidthSum += initialArray[vr];
    
    recordValues(initialArray[vr]);

    if (seveWidthSum > initialWindowWidth) {

      
      
      resetRecord();
    }
    
    if(vr == initialArray.length-1){
      lastRow();
    }

  }
return newArrayWidth;  

}