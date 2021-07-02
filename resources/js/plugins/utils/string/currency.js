/**
 *
 * 12345 => $12,345.00
 *
 * @param {String} sign
 * @param {Number} decimals Decimal places
 */

function currency(value, currency, decimals = 3, location = 1) {
    if (value == '' || value == null) {
        value = 0
    }
    var digitsRE = /(\d{3})(?=\d)/g
    value = parseFloat(value)
    if (!isFinite(value) || (!value && value !== 0)) return ''
    currency = currency != null ? currency : '$'
    decimals = decimals != null ? decimals : 3
    var stringified = Math.abs(value).toFixed(decimals)
    var _int = decimals ? stringified.slice(0, -1 - decimals) : stringified
    var i = _int.length % 3
    var head = i > 0 ? _int.slice(0, i) + (_int.length > 3 ? ',' : '') : ''
    var _float = decimals ? stringified.slice(-1 - decimals) : ''
    var sign = value < 0 ? '-' : ''
    if (location == 1) {
        return (
            currency +
            ' ' +
            sign +
            head +
            _int.slice(i).replace(digitsRE, '$1,') +
            _float
        )
    } else {
        return (
            currency +
            sign +
            head +
            _int.slice(i).replace(digitsRE, '$1,') +
            _float
        )
    }
}
export default currency
