<?php

namespace Tests\Feature;

use Tests\TestCase;

class BasicTest extends TestCase
{
    public function testStaticPagesAvailability()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/orchester/haupt')->assertStatus(200);
        $this->get('/orchester/jugend')->assertStatus(200);
        $this->get('/orchester/kids')->assertStatus(200);
        $this->get('/verein/vorstand')->assertStatus(200);
        $this->get('/verein/mitgliedschaft')->assertStatus(200);
        $this->get('/verein/ausbildung')->assertStatus(200);
        $this->get('/verein/chronik')->assertStatus(200);
        $this->get('/verein/presse')->assertStatus(200);
        $this->get('/galerie')->assertStatus(200);
        $this->get('/kontakt')->assertStatus(200);
        $this->get('/intern')->assertStatus(200);
        $this->get('/datenschutz')->assertStatus(200);
        $this->get('/impressum')->assertStatus(200);
    }

    public function testStaticPagesValidity()
    {
        $this->assertValidHtml($this->get('/')->getContent());
        $this->assertValidHtml($this->get('/orchester/haupt')->getContent());
        $this->assertValidHtml($this->get('/orchester/jugend')->getContent());
        $this->assertValidHtml($this->get('/orchester/kids')->getContent());
        $this->assertValidHtml($this->get('/verein/vorstand')->getContent());
        $this->assertValidHtml($this->get('/verein/mitgliedschaft')->getContent());
        $this->assertValidHtml($this->get('/verein/ausbildung')->getContent());
        $this->assertValidHtml($this->get('/verein/chronik')->getContent());
        $this->assertValidHtml($this->get('/verein/presse')->getContent());
        $this->assertValidHtml($this->get('/galerie')->getContent());
        $this->assertValidHtml($this->get('/kontakt')->getContent());
        $this->assertValidHtml($this->get('/intern')->getContent());
        $this->assertValidHtml($this->get('/datenschutz')->getContent());
        $this->assertValidHtml($this->get('/impressum')->getContent());
    }
}
