<?php namespace vetrinaBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use vetrinaBundle\Form\ContactType;

class DefaultController extends Controller
{
    
   
    public function contactAction()
    {$form = $this->get('form.factory')->create(new ContactType());

         // Get the request
        $request = $this->get('request');

        // Check the method
        if ($request->getMethod() == 'POST')
        {
            // Bind value with form
            $form->bind($request);

            $data = $form->getData();
     
            $message = \Swift_Message::newInstance()
                ->setContentType('text/html')
                ->setSubject($data['Object'])
                ->setFrom($data['email'])
                ->setTo('vetrinapfe@yahoo.com')
                ->setBody($data['Nom'].$data['Description']);

            $this->get('mailer')->send($message);

            // Launch the message flash
            $this->get('session')->getFlashBag()->add('notice', 'Merci de nous avoir contacté, nous répondrons à vos questions dans les plus brefs délais.');


        }

        return $this->render('vetrinaBundle:Default:contact.html.twig',
                array(
                    'form' => $form->createView(),
                ));

    }
      
   
    
    
}
?>