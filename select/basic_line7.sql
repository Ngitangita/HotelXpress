SELECT
    SUM(amount_paid) as total
FROM
    payment
GROUP BY
    method_payment
HAVING
    method_payment = 'mobile money';