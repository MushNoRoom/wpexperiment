function removeSelectionIndicator(selectObj) {
    var currentSelectedOption = selectObj.options[selectObj.selectedIndex].value;
    if (currentSelectedOption >= 0 && (selectObj.options[0].value < 0)) 
    {
       selectObj.remove(0);
    }
}