<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use FOS\RestBundle\Controller\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;

class MoviesController extends Controller
{
    use ControllerTrait;

    /**
     * @Rest\View()
     */
    public function getMoviesAction()
    {
        $movies=$this->getDoctrine()->getRepository('AppBundle:Movie')->findAll();
        return $movies;
    }

    /**
     * @Rest\View()
     * @ParamConverter("movie", converter="fos_rest.request_body")
     * @Rest\NoRoute()
     * @param Movie $movie
     * @return Movie
     */
    public function postMoviesAction(Movie $movie)
    {
         $em = $this->getDoctrine()->getManager();
         $em->persist($movie);
         $em->flush();
         return $movie;


    }

    /**
     * @Rest\View()
     * @param Movie $movie
     * @return \FOS\RestBundle\View\View
     */
    public  function updateMoviesAction(?Movie $movie)
    {

        if (null === $movie){
            return $this->view(null, 404);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($movie);
        $em->flush();
    }

    /**
     * @Rest\View()
     * @param Movie $movie
     * @return \FOS\RestBundle\View\View
     */
    public  function deleteMoviesAction(?Movie $movie)
    {

        if (null === $movie){
            return $this->view(null, 404);
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($movie);
        $em->flush();
    }

    /**
     * @Rest\View()
     * @param Movie $movie
     * @return Movie|\FOS\RestBundle\View\View|null
     */
    public  function getMovieAction(?Movie $movie)
    {

        if (null === $movie){
            return $this->view(null, 404);
        }

        return $movie;
    }

}