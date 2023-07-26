describe('LandingPage', () => {
  it('landingpage1', () => {
    cy.visit('http://127.0.0.1:8000/');
    cy.wait(2000);
    cy.get('.logo > a').should('have.text', 'SIPMA');
    cy.wait(2000);
    cy.get(':nth-child(2) > .nav-link').click();
    cy.wait(2000);
    cy.get('#about > .container > .section-title > h2').should('have.text', 'About Us');
    cy.wait(2000);
    cy.get(':nth-child(3) > .nav-link').click();
    cy.wait(2000);
    cy.get('#services > .container > .section-title > h2').should('have.text', 'Services');
    cy.wait(2000);
    cy.get(':nth-child(5) > .nav-link').click();
    cy.wait(2000);
    cy.get('#statistik > .container > .section-title > h2').should('have.text', 'Statistik');

    // Scroll halaman ke bawah sejauh 500 piksel
    cy.scrollTo(0, 5725);
    cy.wait(2000);
  })
})

