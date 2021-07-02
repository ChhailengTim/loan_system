
function currencyFormat(value) {
    return (parseFloat(value)).toFixed(3).replace(/\d(?=(\d{3})+\.)/g, '$&,')
}

export default currencyFormat
