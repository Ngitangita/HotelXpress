import "./footer.css";
const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: 'smooth' });
};
const Footer = () => {
  return (
    <div className="footer">
      <div className="fLists">
        <ul className="fList">
          <li className="fListItem">Pays</li>
          <li className="fListItem">Régions</li>
          <li className="fListItem">Villes</li>
          <li className="fListItem">Districts</li>
          <li className="fListItem">Aéroports</li>
          <li className="fListItem">Hôtels</li>
        </ul>
        <ul className="fList">
          <li className="fListItem">Maisons </li>
          <li className="fListItem">Appartements</li>
          <li className="fListItem">Stations</li>
          <li className="fListItem">Villas</li>
          <li className="fListItem">Auberges</li>
          <li className="fListItem">Maisons d’hôtes</li>
        </ul>
        <ul className="fList">
          <li className="fListItem">Des lieux de séjour uniques </li>
          <li className="fListItem">Critiques</li>
          <li className="fListItem">Unpacked: Articles de voyage </li>
          <li className="fListItem">Communautés touristiques</li>
          <li className="fListItem">Offres saisonnières et vacances </li>
        </ul>
        <ul className="fList">
          <li className="fListItem">Location de voiture </li>
          <li className="fListItem">Recherche de vol</li>
          <li className="fListItem">Réservations de restaurants</li>
          <li className="fListItem">Agents de voyages</li>
        </ul>
        <ul className="fList">
          <li className="fListItem">Curtomer Service</li>
          <li className="fListItem">Aide aux partenaires</li>
          <li className="fListItem">Carrières</li>
          <li className="fListItem">Durabilité</li>
          <li className="fListItem">Centre de presse</li>
          <li className="fListItem">Centre de ressources sur la sécurité</li>
          <li className="fListItem">Relations avec les investisseurs</li>
          <li className="fListItem">Termes et conditions</li>
        </ul>
      </div>
      <button onClick={scrollToTop}>Faire défiler vers le haut</button>
    </div>
  );
};

export default Footer;
