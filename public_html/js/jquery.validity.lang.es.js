function msjEspaniol(){ 
$.extend($.validity.messages, {
    require:"#{field} es requerido.",

    // Formato de validadores:
    match:"#{field} es un formato no válido.",
    integer:"#{field} debe ser un número positivo.",
    date:"#{field} debe tener el formato de una fecha: dd/mm/aaaa",
    email:"#{field} debe estar formateado como un correo electrónico.",
    usd:"#{field} estar formateado como un monto en dólares de EE.UU.",
    url:"#{field} debe tener el formato de una URL.",
    number:"#{field} debe estar formateado de número.",
    zip:"#{field} debe ser el formato de un código postal ##### o #####-####.",
    phone:"#{field} debe ser el formato de un número de teléfono ###-###-####.",
    guid:"#{field} debe ser el formato de un GUID como {3F2504E0-4F89-11D3-9A0C-0305E82C3301}.",
    time24:"#{field} debe estar formateado como un tiempo de 24 h: 23:00.",
    time12:"#{field} debe estar formateado como un tiempo de 12 h: 12:00 AM/PM",

    // Value range messages:
    lessThan:"#{field} debe ser menor a #{max}.",
    lessThanOrEqualTo:"#{field} debe ser menor o igual a #{max}.",
    greaterThan:"#{field} debe ser mayor que #{min}.",
    greaterThanOrEqualTo:"#{field} debe ser mayor o igual a #{min}.",
    range:"#{field} debe estar entre #{min} y  #{max}.",

    // Value length messages:
    tooLong:"#{field} no puede ser superior a #{max} caracteres.",
    tooShort:"#{field} no puede ser menor a #{min} caracteres.}",

    // Aggregate validator messages:
    equal:"Los valores no coinciden.",
    distinct:"El valor se repitió.",
    sum:" Los valores no se suman a #{sum}.",
    sumMax:" La suma de los valores debe ser menor a #{max}.",
    sumMin:" La suma de los valores debe ser mayor a #{min}.",

    nonHtml:"#{field} no puede contener caracteres en HTML.",

    generic:"no válido."
});
$.extend($.validity.patterns, {
    
    date:/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/[0-9]{4}$/,
    
    
    cedula: /^\d{10}$/,
    
    number:/^[+-]?(\d+(\,\d*)?|\,\d+)([Ee]-?\d+)?$/,
    
    
    phone: /((8|\+7)-?)?\(?\d{3,5}\)?-?\d{1}-?\d{1}-?\d{1}-?\d{1}-?\d{1}((-?\d{1})?-?\d{1})?/
});
}
msjEspaniol();
