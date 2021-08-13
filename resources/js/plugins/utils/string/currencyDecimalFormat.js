function currencyDecimalFormat(value) {
    return parseFloat(value).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&.')
}

export default currencyDecimalFormat