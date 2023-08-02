import "./searchItem.css";

const SearchItem = () => {
  return (
    <div className="searchItem">
      <img
        src="https://cf.bstatic.com/xdata/images/hotel/square600/261707778.webp?k=fa6b6128468ec15e81f7d076b6f2473fa3a80c255582f155cae35f9edbffdd78&o=&s=1"
        alt=""
        className="siImg"
      />
      <div className="siDesc">
        <h1 className="siTitle">Tower Street Appartements</h1>
        <span className="siDistance">500m du centre</span>
        <span className="siTaxiOp">Taxi aéroport gratuit</span>
        <span className="siSubtitle">
        Studio avec Air Conditionné (Studio Apartment with Air Conditionné)
        </span>
        <span className="siFeatures">
        Studio entier • 1 salle de bain • 21m² 1 lit double
        </span>
        <span className="siCancelOp">Annulation gratuite</span>
        <span className="siCancelOpSubtitle">
        Vous pouvez annuler plus tard, alors verrouillez ce prix avantageux aujourd’hui!
        </span>
      </div>
      <div className="siDetails">
        <div className="siRating">
          <span>Excellente</span>
          <button>8.9</button>
        </div>
        <div className="siDetailTexts">
          <span className="siPrice">$112</span>
          <span className="siTaxOp">Comprend les taxes et les frais</span>
          <button className="siCheckButton">Voir la disponibilité</button>
        </div>
      </div>
    </div>
  );
};

export default SearchItem;
