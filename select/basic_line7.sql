SELECT COUNT(payment.amount_paid) FROM payment
GROUP BY payment.amount_paid,payment.method_payment
HAVING payment.method_payment = 'Mobile Money';