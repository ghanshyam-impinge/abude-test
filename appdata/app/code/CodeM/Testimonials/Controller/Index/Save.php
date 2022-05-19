<?php
/**
 * @category   CodeM
 * @package    CodeM_Testimonials
 * @author     ghan.impinge@gmail.com
 
 */

namespace CodeM\Testimonials\Controller\Index;

use Magento\Framework\App\Action\Context;
use CodeM\Testimonials\Model\TestimonialsFactory;

class Save extends \Magento\Framework\App\Action\Action
{
	/**
     * @var Testimonials
     */
    protected $_testimonials;

    public function __construct(
		Context $context,
        TestimonialsFactory $testimonials
    ) {
        $this->_testimonials = $testimonials;
        parent::__construct($context);
    }
	public function execute()
    {
        $data = $this->getRequest()->getParams();
    	$testimonials = $this->_testimonials->create();
        //echo "<pre>"; print_r($data); die('here');
        $testimonials->setData($data);
        if($testimonials->save()){
            $this->messageManager->addSuccessMessage(__('Your testimonial has been submitted successfully.'));
        }else{
            $this->messageManager->addErrorMessage(__('Data was not saved.'));
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('testimonials/index/index');
        return $resultRedirect;
    }
}
