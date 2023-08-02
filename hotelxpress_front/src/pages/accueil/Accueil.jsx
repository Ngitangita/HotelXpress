import "./accueil.css";
import Navbar from "../../Commone/navbar/Navbar";
import Header from "../../Commone/header/Header";
import MailList from "../../Commone/mailList/MailList";
import Footer from "../../Commone/footer/Footer";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faCircleArrowLeft,
  faCircleArrowRight,
  faCircleXmark,
  faLocationDot,
} from "@fortawesome/free-solid-svg-icons";
import { useState } from "react";

const Accueil = () => {
  const [slideNumber, setSlideNumber] = useState(0);
  const [open, setOpen] = useState(false);
  const photos = [
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261707778.jpg?k=56ba0babbcbbfeb3d3e911728831dcbc390ed2cb16c51d88159f82bf751d04c6&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261707367.jpg?k=cbacfdeb8404af56a1a94812575d96f6b80f6740fd491d02c6fc3912a16d8757&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261708745.jpg?k=1aae4678d645c63e0d90cdae8127b15f1e3232d4739bdf387a6578dc3b14bdfd&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261707776.jpg?k=054bb3e27c9e58d3bb1110349eb5e6e24dacd53fbb0316b9e2519b2bf3c520ae&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261708693.jpg?k=ea210b4fa329fe302eab55dd9818c0571afba2abd2225ca3a36457f9afa74e94&o=&hp=1",
    },
    {
      src: "https://cf.bstatic.com/xdata/images/hotel/max1280x900/261707389.jpg?k=52156673f9eb6d5d99d3eed9386491a0465ce6f3b995f005ac71abc192dd5827&o=&hp=1",
    },
  ];

  const handleOpen = (i) => {
    setSlideNumber(i);
    setOpen(true);
  };

  const handleMove = (direction) => {
    let newSlideNumber;

    if (direction === "l") {
      newSlideNumber = slideNumber === 0 ? 5 : slideNumber - 1;
    } else {
      newSlideNumber = slideNumber === 5 ? 0 : slideNumber + 1;
    }

    setSlideNumber(newSlideNumber)
  };

  return (
    <div>
      <Navbar />
      <Header />
      <div className="hotelContainer">
        {open && (
          <div className="slider">
            <FontAwesomeIcon
              icon={faCircleXmark}
              className="close"
              onClick={() => setOpen(false)}
            />
            <FontAwesomeIcon
              icon={faCircleArrowLeft}
              className="arrow"
              onClick={() => handleMove("l")}
            />
            <div className="sliderWrapper">
              <img src={photos[slideNumber].src} alt="" className="sliderImg" />
            </div>
            <FontAwesomeIcon
              icon={faCircleArrowRight}
              className="arrow"
              onClick={() => handleMove("r")}
            />
          </div>
        )}
        <div className="hotelWrapper">
          <button className="bookNow">Réservez ou réservez maintenant!</button>
          <h1 className="hotelTitle">Tower Street Appartements</h1>
          <div className="hotelAddress">
            <FontAwesomeIcon icon={faLocationDot} />
            <span>Elton St 125 New York</span>
          </div>
          <iframe title="Carte interactive" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!
          1d142.99203243894016!2d-74.0093180384748!3d40.712632277004445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!
          4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20%C3%89
          tat%20de%20New%20York%2C%20%C3%89tats-Unis!5e1!3m2!1sfr!2smg!4v1690376166147!5m2!1sfr!2smg" />
          <span className="hotelDistance">
          Excellent emplacement – à 500m du centre
          </span>
          <span className="hotelPriceHighlight">
          Réservez un séjour de plus de 114 $ dans cet établissement et obtenez un taxi aéroport gratuit
          </span>
          <div className="hotelImages">
            {photos.map((photo, i) => (
              <div className="hotelImgWrapper" key={i}>
                <img
                  onClick={() => handleOpen(i)}
                  src={photo.src}
                  alt=""
                  className="hotelImg"
                />
              </div>
            ))}
          </div>
          <div className="hotelDetails">
            <div className="hotelDetailsTexts">
              <h1 className="hotelTitle">Séjournez au cœur de la ville</h1>
              <p className="hotelDesc">
                Situé à Cracovie, à 5 minutes à pied 
                de la porte Saint-Florian, le Tower Street Apartments propose des 
                hébergements climatisés dotés d’une connexion Wi-Fi gratuite. Les logements 
                disposent de parquet, d’une kitchenette entièrement équipée avec un micro-ondes, 
                d’une télévision à écran plat et d’une salle de bains privative avec douche et sèche-cheveux. 
                Un réfrigérateur est également offert, ainsi qu’une bouilloire et une machine à café. 
                Les sites d’intérêt à proximité de l’appartement incluent la Halle aux Draps, 
                la place du marché principal et la tour de l’hôtel de ville. L’aéroport international 
                Jean-Paul II de Cracovie-Balice, le plus proche, se trouve à 16,1 km du Tower Street 
                Apartments et propose un service de navette aéroport payant.
              </p>
            </div>
            <div className="hotelDetailsPrice">
              <h1>Parfait pour un séjour de 9 nuits!</h1>
              <span>
              Situé en plein cœur de Cracovie, 
              cet établissement affiche l’excellente note de 9,8 pour sa situation géographique.
              </span>
              <h2>
                <b>$945</b> (9 nuits)
              </h2>
              <button>Réservez ou réservez maintenant!</button>
            </div>
          </div>
        </div>
        <MailList />
        <Footer />
      </div>
    </div>
  );
};

export default Accueil;