import React from 'react'
import './payment.css'

const Payment = () => {
  return (
    <div id='Payment'>
      <form className='payment'>
          <label id='labelpayment'> Date payment:
            <input type="date"/>
          </label>
          <div className='Paymentselect'> Payment method:
              <select name="" id="">
              <option value="Cash">Cash</option>
              <option value="Check">Check</option>
              <option value="Bank transfer">Bank transfer</option>
              <option value="Mvola mobile money service">Mvola mobile money service</option>
              <option value="PayPal">PayPal</option>
              <option value="Credit and debit cards">Credit and debit cards</option>
              <option value="Apple Pay">Apple Pay</option>
              <option value="Google Pay">Google Pay</option>
              <option value="Samsung Pay">Samsung Pay</option>
              <option value="Cryptocurrencies">Cryptocurrencies</option>
              <option value="Gift cards and prepaid cards">Gift cards and prepaid cards</option>
              <option value="Cash on delivery">Cash on delivery</option>
              <option value="Stripe">Stripe</option>
              <option value="Square">Square</option>
              <option value="Braintree">Braintree</option>
              <option value="Money order">Money order</option>
              <option value="Mobile wallets">Mobile wallets</option>
              <option value="WeChatPay">WeChatPay</option>
              </select>
          </div>
          <label id='labelpayment'> Amount paid:
            <input type="number"/>
          </label>
          <div className='buttonpayment'>
            <button value='button'>Send</button>
          </div>
      </form>
    </div>
  )
}

export default Payment