<?php
 
namespace OpenCert\Helloworld\Controller\Index;
 
use Magento\Framework\App\Action\Context;
 
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_registry;

    public function __construct(Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory,
                                \Magento\Framework\Registry $registry
)
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_registry = $registry;
        parent::__construct($context);
    }
 
    public function execute()
    {   

        $this->_registry->register('custom_var', 'Test Registry');


        $resultPage = $this->_resultPageFactory->create();

//            echo '<pre>';
//            $debugBackTrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
//            foreach ($debugBackTrace as $item) {
//                echo @$item['class'] . @$item['type'] . @$item['function'] . "\n";
//            }
//             die();

        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $productCollection = $objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        // $collection = $productCollection->addAttributeToSelect('*')
        //     ->load();

        // print_r($collection->getData());
        // die();

        return $resultPage;
    }
    
}